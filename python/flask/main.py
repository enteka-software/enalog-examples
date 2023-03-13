from flask import Flask
from enalog import push_event

app = Flask(__name__)


@app.route("/")
def hello_world():
    user_plan = "pro-annually"
    user_id = 123

    push_event(
        api_token="<ENALOG_API_TOKEN>",
        event={
            "project": "project-name",
            "name": "user-subscribed",
            "description": f"User susbcribed to our SaaS product on the {user_plan} plan",
            "icon": "💰",
            "push": False,
            "tags": ["signup", "billing"],
            "meta": {"user_id": user_id, "plan": user_plan},
        },
    )

    return "<p>Hello, World!</p>"
