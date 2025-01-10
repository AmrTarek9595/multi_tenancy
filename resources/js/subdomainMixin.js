export const subdomainMixin = {
    mounted() {
        const currentUrl = window.location.href;
        const parsedUrl = new URL(currentUrl);
        const hostname = parsedUrl.hostname;
        const subdomain = hostname.split('.')[0];
        // console.log(subdomain);
    }
};
