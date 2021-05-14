new Vue({
    el: "#app",
    data: {
        baseUrl: "http://localhost:8888/general-rehearse/php-include-ajax-again/server_js.php",
        queryGenre: "classic",
        albums: [],
    },
    mounted() {
        axios(`${this.baseUrl}?genre=${this.queryGenre}`)
        .then(res => this.albums = res.data);
    },
})