from flask import Flask, request, jsonify
import joblib
import os

app = Flask(__name__)

# Load model dan pipeline
MODEL_PATH = os.path.join("model", "iris_model.pkl")

try:
    model = joblib.load(MODEL_PATH)
except Exception as e:
    print(f"Gagal memuat model: {e}")
    model = None

@app.route('/predict', methods=['POST'])
def predict():
    if not model:
        return jsonify({"error": "Model tidak tersedia"}), 500

    data = request.get_json()
    if not data:
        return jsonify({"error": "Tidak ada data JSON yang diterima"}), 400

    try:
        input_data = [
            float(data['sepal_length']),
            float(data['sepal_width']),
            float(data['petal_length']),
            float(data['petal_width'])
        ]
    except KeyError as ke:
        return jsonify({"error": f"Parameter hilang: {ke}"}), 400
    except ValueError:
        return jsonify({"error": "Semua parameter harus berupa angka"}), 400

    try:
        prediction = model.predict([input_data])[0]
        proba = model.predict_proba([input_data])[0]
        return jsonify({
            "prediction": str(prediction),
            "probabilities": {str(label): round(float(p), 4) for label, p in zip(model.classes_, proba)}
        })
    except Exception as e:
        return jsonify({"error": f"Gagal memproses prediksi: {str(e)}"}), 500

if __name__ == '__main__':
    app.run(host='127.0.0.1', port=5000, debug=True)
