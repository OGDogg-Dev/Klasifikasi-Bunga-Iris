import pandas as pd
from sklearn.datasets import load_iris
from sklearn.utils import resample

# Load dataset bawaan sklearn (150 baris)
iris = load_iris()
df = pd.DataFrame(iris.data, columns=iris.feature_names)
df['species'] = pd.Categorical.from_codes(iris.target, iris.target_names)

# Rename kolom agar konsisten
df.columns = ['sepal_length', 'sepal_width', 'petal_length', 'petal_width', 'species']

# Resample jadi 200 baris (dengan pengulangan)
df_200 = resample(df, replace=True, n_samples=200, random_state=42)

# Simpan ke CSV
df_200.to_csv('iris.csv', index=False)

print("File 'iris.csv' berhasil dibuat dengan 200 baris.")
