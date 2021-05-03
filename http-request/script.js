const apiKey = "ce3b6870fdfccf78b80dcdd8f1af7e7c";
const baseUrl = "https://api.themoviedb.org/3/";

// ---- VANILLA
let vanillaRes = "";
fetch(`${baseUrl}search/movie?api_key=${apiKey}&language=en-US&page=1&include_adult=false&query=jack`)
.then(res => res.json())
.then(res => {
    for(let movie of res.results) {
        vanillaRes += `<li>${movie.title}</li>`;
    }
    document.querySelector(".target-vanilla").innerHTML = vanillaRes;
})

// ---- JQUERY
let jqueryRes = "";
$.ajax({
    url: `${baseUrl}search/movie?api_key=${apiKey}&language=en-US&page=1&include_adult=false&query=jack`,
    method: "GET",
    success: function(data, status) {
        data.results.forEach(movie => jqueryRes += `<li>${movie.title}</li>`);
        document.querySelector(".target-jquery").innerHTML = jqueryRes;
    },
    error: function(request, status, error) {
        console.error(`Something went wrong. Request: ${request}, Status: ${status}, Error: ${error}`);
    }
})

// ---- VUE
new Vue({
    el: "#app",
    data: {
        apiKey: "ce3b6870fdfccf78b80dcdd8f1af7e7c",
        baseUrl: "https://api.themoviedb.org/3/",
        res: [],
    },
    mounted() {
        axios
        .get(`${this.baseUrl}search/movie?api_key=${this.apiKey}&language=en-US&page=1&include_adult=false&query=jack`)
        .then(res => this.res = res.data.results)
    }
})