from roboflow import Roboflow
import os
rf = Roboflow(api_key="OmssS0x7eCppP0K0FVMU")
project = rf.workspace().project("shoes-categories")
latest_version = project.versions()  # Get the last version (latest)
print(latest_version[-1])
model = latest_version[-1].model


# infer on a local image
current_dir = os.path.dirname(os.path.abspath(__file__))
image_path = os.path.join(current_dir, "adidasa.jpg")
model.predict(image_path).save("prediction.jpg")