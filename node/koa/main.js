const Koa = require('koa');
const enalog = require('enalog')

const app = new Koa();

app.use(async ctx => {
    const user_plan = "pro-annually"
    const user_id = 123

    enalog.pushEvent('<ENALOG_API_TOKEN>', {
        project: "project-name",
        name: "user-subscribed",
        description: `User susbcribed to our SaaS product on the ${user_plan} plan`,
        icon: "💰",
        push: false,
        tags: ["signup", "billing"],
        meta: {"user_id": user_id, "plan": user_plan},
    })

    ctx.body = 'Hello World';
});

app.listen(3000);