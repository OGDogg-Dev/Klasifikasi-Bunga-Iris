import pandas as pd
from sklearn.neighbors import KNeighborsClassifier
import joblib

df = pd.read_csv("iris.csv")
X = df.drop("species", axis=1)
y = df["species"]

model = KNeighborsClassifier(n_neighbors=3)
model.fit(X, y)
joblib.dump(model, "model/iris_model.pkl")
