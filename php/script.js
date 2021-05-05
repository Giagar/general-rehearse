

axios
.get("./server.php")
.then(res => {
    let result = "";
    for(let item in res.data) {
        result += `<li>${item}: ${res.data[item]}</li>`;
    }
    document.querySelector(".target").innerHTML = result;
})