(*) Account test:
Admin:
Email: mannydan@gmail.com
Password: 1234567890

Staff:
Email: jakebobby@gmail.com
Password: 1234567890

(*) Run docker compose:
Step 1: Run "docker-compose up --build"
Step 2: Go to "http://localhost:8080/" and enjoy the app
Step 3: You can delete the app by using "docker-compose down" or stop the app 
You can scale your app to many replicas by using this: docker-compose up --scale <service_name>=<number_instance_you_want>

Example: docker-compose up --scale app=10