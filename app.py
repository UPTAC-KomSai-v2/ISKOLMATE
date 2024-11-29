from flask import Flask, render_template, request, redirect, url_for
import numpy as np
import os
from collections import Counter 
import cv2
import threading
import time

# Model and dataset related imports
import tensorflow as tf
from tensorflow import keras
from keras.models import load_model

app = Flask(__name__, static_url_path='/static')

models_dictionary = {
    "RGB_HSV_model": None,
    "HSV_RGB_model": None,
    "RGB_LAB_model": None,
    "LAB_RGB_model": None,
    "RGB_LUV_model": None,
    "LUV_RGB_model": None,
    "RGB_XYZ_model": None,
    "XYZ_RGB_model": None,
    "RGB_YCbCr_model": None,
    "RGB_YUV_model": None,
    "XYZ_HSV_model": None,
    "XYZ_LAB_model": None,
    "XYZ_LUV_model": None,
    "XYZ_YCbCr_model": None,
    "XYZ_YUV_model": None,
    "HSV_LAB_model": None,
    "HSV_LUV_model": None,
    "HSV_YCbCr_model": None,
    "HSV_YUV_model": None,
    "LAB_LUV_model": None,
    "LAB_YCbCr_model": None,
    "LAB_YUV_model": None,
    "LUV_YCbCr_model": None,
    "LUV_YUV_model": None,
    "YCbCr_YUV_model": None
}

def load_model_in_background(model_key, model_path):
    global models_dictionary
    print(f"Loading {model_key} from {model_path}")
    models_dictionary[model_key] = tf.keras.models.load_model(model_path)
    print(f"Loaded {model_key}")

def load_all_models():
    model_paths = {
        "RGB_HSV_model": 'models/RGB_HSV.keras',
        "HSV_RGB_model": 'models/RGB_HSV.keras',
        "RGB_LAB_model": 'models/RGB_LAB.keras',
        "LAB_RGB_model": 'models/RGB_LAB.keras',
        "RGB_LUV_model": 'models/RGB_LUV.keras',
        "LUV_RGB_model": 'models/RGB_LUV.keras',
        "RGB_XYZ_model": 'models/RGB_XYZ.keras',
        "XYZ_RGB_model": 'models/RGB_XYZ.keras',
        "RGB_YCbCr_model": 'models/RGB_YCbCr.keras',
        "RGB_YUV_model": 'models/RGB_YUV.keras',
        "XYZ_HSV_model": 'models/XYZ_HSV.keras',
        "XYZ_LAB_model": 'models/XYZ_LAB.keras',
        "XYZ_LUV_model": 'models/XYZ_LUV.keras',
        "XYZ_YCbCr_model": 'models/XYZ_YCbCr.keras',
        "XYZ_YUV_model": 'models/XYZ_YUV.keras',
        "HSV_LAB_model": 'models/HSV_LAB.keras',
        "HSV_LUV_model": 'models/HSV_LUV.keras',
        "HSV_YCbCr_model": 'models/HSV_YCbCr.keras',
        "HSV_YUV_model": 'models/HSV_YUV.keras',
        "LAB_LUV_model": 'models/LAB_LUV.keras',
        "LAB_YCbCr_model": 'models/LAB_YCbCr.keras',
        "LAB_YUV_model": 'models/LAB_YUV.keras',
        "LUV_YCbCr_model": 'models/LUV_YCbCr.keras',
        "LUV_YUV_model": 'models/LUV_YUV.keras',
        "YCbCr_YUV_model": 'models/YCbCr_YUV.keras'
    }

    for model_key, model_path in model_paths.items():
        threading.Thread(target=load_model_in_background, args=(model_key, model_path)).start()

load_all_models()

print("-----------------------------------reading the labels-----------------------------------")
# Read labels from the labels.txt file
with open('labels.txt', 'r') as file:
    labels = [line.strip() for line in file.readlines()]

past_img_path = ''

@app.route("/", methods=["GET", "POST"])
def homes():
    if request.method == "POST":
        global past_img_path
        global past_img_path2

        uploaded_file = request.files.get("file") 

        colors = []

        for i in range(21):
            if request.form.get(f"model-{i}-1"):
                print(i)
                selected_color1 = request.form.get(f"model-{i}-1")
                selected_color2 = request.form.get(f"model-{i}-2")
                colors.append([selected_color1, selected_color2])
                print(colors[i])
            else:
                break   

        selected_voting = request.form.get("voting-mechanism")

        print(selected_voting)

        if uploaded_file:
            img_path = f"static/uploads/{uploaded_file.filename}"
            uploaded_file.save(img_path)
            result = ensemble(img_path, colors, selected_voting)
            os.remove(past_img_path) if os.path.exists(past_img_path) else None
            past_img_path = img_path
        else:
            result = ensemble(past_img_path, selected_model1, selected_model2, selected_model3, selected_voting)

        # string_values = "[6.245e-01, 4.292e-06, 4.476e-05, 1.431e-06, 4.953e-05, 5.960e-08, 2.980e-07, 0.000e+00, 2.215e-04, 1.192e-07, 2.394e-04, 1.371e-06, 3.219e-06, 5.960e-08, 4.083e-05, 1.788e-07, 1.413e-05, 1.006e-04, 2.611e-05, 5.364e-05, 1.550e-06, 6.855e-06, 4.292e-06, 1.049e-05, 2.384e-07, 9.835e-06, 7.749e-07, 3.129e-05, 7.868e-06, 5.245e-06, 5.960e-08, 4.166e-05, 1.192e-07, 0.000e+00, 3.636e-06, 1.073e-06, 5.960e-08, 2.384e-07, 2.146e-06, 2.086e-04, 3.982e-05, 3.397e-06, 1.799e-03, 3.517e-06, 5.960e-08, 5.960e-08, 1.034e-02, 3.517e-06, 1.192e-07, 3.534e-03, 6.437e-06, 7.749e-07, 2.128e-05, 2.384e-06, 0.000e+00, 2.801e-06, 3.576e-07, 1.872e-05, 1.907e-06, 7.272e-06, 8.345e-07, 8.643e-06, 2.795e-05, 1.192e-07, 0.000e+00, 1.192e-07, 1.627e-05, 2.277e-05, 6.258e-06, 5.960e-08, 1.073e-06, 1.192e-07, 7.396e-04, 1.788e-07, 2.087e-03, 0.000e+00, 1.570e-03, 1.788e-06, 5.960e-07, 5.960e-07, 5.883e-05, 5.960e-08, 2.980e-07, 5.364e-07, 0.000e+00, 1.311e-06, 9.537e-07, 4.768e-07, 0.000e+00, 0.000e+00, 4.768e-07, 2.384e-07, 3.457e-06, 2.980e-07, 5.066e-06, 5.484e-06, 1.192e-07, 4.172e-07, 2.742e-06, 4.137e-05, 3.552e-01]"

        # # Convert string to array of floats
        # result = np.array(eval(string_values))

        sorted_indexes = result.argsort()
        reverse_sorted_indexes = sorted_indexes[::-1]         

        print("Result:", result)  # Debugging statement

        past_img_path2 = past_img_path.replace("static/", "")
        # Pass the result array to the template
        return render_template("index.html", result=result, labels=labels, reverse_sorted_indexes=reverse_sorted_indexes, img_path=past_img_path2)

    return render_template("index.html")

def rescale_0_to_255(image):
    converted_image = np.copy(image)
    for i in range(3):  # Iterate over RGB channels
        min_val = np.min(converted_image[:,:,i])
        max_val = np.max(converted_image[:,:,i])

        if max_val != min_val:
            converted_image[:,:,i] = np.round(((converted_image[:,:,i] - min_val) / (max_val - min_val)) * 255)
        else:
            converted_image[:,:,i] = np.nan

    return converted_image

def process_image(image_path, color_space, img_size=224):
    image = cv2.imread(image_path)
    image = cv2.resize(image, (img_size, img_size))

    image = np.copy(image)

    if color_space == "HSV":
        image = cv2.cvtColor(image, cv2.COLOR_RGB2HSV)
    elif color_space == "LAB":
        image = cv2.cvtColor(image, cv2.COLOR_RGB2LAB)
    elif color_space == "LUV":
        image = cv2.cvtColor(image, cv2.COLOR_RGB2LUV)
    elif color_space == "RGB":
        pass
    elif color_space == "XYZ":
        image = cv2.cvtColor(image, cv2.COLOR_RGB2XYZ)
    elif color_space == "YCbCr":
        image = cv2.cvtColor(image, cv2.COLOR_RGB2YCrCb)
    elif color_space == "YUV":
        image = cv2.cvtColor(image, cv2.COLOR_RGB2YUV)
    else:
        return "Invalid color space"
        
    image = np.array(image)  # Convert to NumPy array
    image = tf.convert_to_tensor(image, dtype=tf.uint8)
    image = rescale_0_to_255(image)
    image = tf.cast(image, tf.uint8)

    return image

def ensemble(image_path, models, voting):
    predictions = np.zeros((3, 101))

    color_images = {}
    color_spaces = ["RGB", "XYZ", "HSV", "LAB", "LUV", "YCbCr", "YUV"]
    for color_space in color_spaces:
        color_images[color_space] = tf.expand_dims(process_image(image_path, color_space), 0)

    for i, model in enumerate(models):
        color1 = model[0]
        color2 = model[1]
        model_name = f"{color1}_{color2}_model"
        
        if models_dictionary[model_name] is None:
            return f"{model_name} model is still loading. Please try again later."

        predictions[i] = models_dictionary[model_name].predict([color_images[color1], color_images[color2]])
        print(f"{model_name} Predicted!")
        print(predictions[i])

    ensemble_predictions = predictions.squeeze()

    if voting == "plurality":
        return plurality(ensemble_predictions)
    elif voting == "average":
        return average(ensemble_predictions)
    elif voting == "product":
        return product(ensemble_predictions)
    elif voting == "median":
        return median(ensemble_predictions)
    elif voting == "minimum":
        return minimum(ensemble_predictions)
    elif voting == "maximum":
        return maximum(ensemble_predictions)
    else:
        return "Invalid voting mechanism"

def plurality(predictions):
    prediction = np.argmax(predictions, axis=1)
    count = Counter(prediction)
    final_pred = count.most_common(1)[0][0]
    final_preds = np.zeros(101)
    final_preds[final_pred] = 1

    return final_preds

def average(predictions):
    average_preds = np.average(predictions, axis=0)      
    return average_preds

def product(predictions):
    product_preds = np.product(predictions, axis=0)                
    original_sum = np.sum(product_preds)                            
    normalized_product_preds = (product_preds / original_sum) * 1   
    return normalized_product_preds

def median(predictions):
    median_preds = np.median(predictions, axis=0)
    return median_preds

def minimum(predictions):
    minimum_preds = np.min(predictions, axis=0)
    return minimum_preds

def maximum(predictions):
    maximum_preds = np.max(predictions, axis=0)
    return maximum_preds

if __name__ == "__main__":
    app.run(debug=True)
