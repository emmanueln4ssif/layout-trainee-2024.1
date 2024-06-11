async function amostra(titulo) {

    const apiUrl = `https://www.googleapis.com/books/v1/volumes?q=${encodeURIComponent(titulo)}`;

    const response = await fetch(apiUrl);
    const data = await response.json();

    if (data.items && data.items.length > 0) {
        const firstBook = data.items[0];
        const sampleLink = firstBook.accessInfo.webReaderLink;
        console.log(sampleLink);
        document.getElementById('amostra').setAttribute('onclick', `location.href='${sampleLink}'`);
        document.getElementById('amostra').style.textDecoration = "underline";
        document.getElementById('amostra').style.cursor = "pointer";
    } else {
        document.getElementById('amostra').innerHTML = "Sem amostra disponível";
    }
}

const titulo = document.getElementById('livro_titulo').textContent;
amostra(titulo);
