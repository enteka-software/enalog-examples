// Next.js API route support: https://nextjs.org/docs/api-routes/introduction
import { pushEvent } from "enalog";

export default async function handler(req, res) {
	const newEvent = await pushEvent("API KEY HERE", {
		project: "my-first-project",
		name: "New event has been created in NuxtJs in the api!",
		description: "Hello from NextJs!",
		push: true,
	}).then((res) => {
		console.log(res);
	});
	res.status(200).json({ name: "John Doe" });
}
