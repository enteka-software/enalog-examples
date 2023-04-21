import Script from "next/script";

export default function Autotrack() {
  return (
    <>
      <Script
        src="https://static.enalog.app/autotrack.min.js"
        data-name="enalog"
        data-enalog-token="<api-token-goes-here>"
        data-enalog-project="<project-slug-goes-here>"
        onReady={() => {
            initAutotrack();
        }}
      />
    </>
  );
}
