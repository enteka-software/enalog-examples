from fastapi import FastAPI
from enalog import push_event

app = FastAPI()


@app.get("/")
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

    return {"Hello": "World"}
