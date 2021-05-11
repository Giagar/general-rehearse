new Vue({
    el: "#app_e1",
    data: {
        genres: [],
        selectedGenre: "all",
        albums: [],
    },
    methods: {
        // getting only disc of a certain genre
        handleGenre(newGenre) {
            axios
            .get("http://localhost:8888/general-rehearse/php-include-ajax/server.php?genre=" + this.selectedGenre)
            .then(res => {
                this.albums = [...res.data];
            });
        }
    },
    mounted() {
        axios
        .get("http://localhost:8888/general-rehearse/php-include-ajax/server.php?genre=" + this.selectedGenre)
        .then(res => {
            res.data.forEach(disc => {
                // getting existing categories in db
                if(!this.genres.includes(disc.genre)) {
                    this.genres.push(disc.genre);
                }

                // getting the albums
                this.albums = [...res.data];
            })
        });
    }
})