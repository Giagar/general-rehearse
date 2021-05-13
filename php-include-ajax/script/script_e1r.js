new Vue({
    el: "#app_e1r",
    data: {
        prova: "ok",
        albums: [],
        genres: [],
        selectedGenre: "",
    },
    methods: {
        handleFilter(value){
            this.selectedGenre = value;
            axios
            .get("http://localhost:8888/general-rehearse/php-include-ajax/server_e1r.php?genre=" + this.selectedGenre)
            .then(res => {
                console.log(res.data);
                this.albums = [...res.data]
            });
        }
    },
    mounted() {
        axios
        .get("http://localhost:8888/general-rehearse/php-include-ajax/server_e1r.php")
        .then(res => {
            // console.log(res.data)
            this.albums = res.data;
            res.data.forEach(album => {
                if(!this.genres.includes(album.genre)) {
                    this.genres.push(album.genre);
                }
            })
        });
    }
})