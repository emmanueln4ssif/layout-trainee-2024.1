async function amostra(titulo, autor) {
    let queryParams = `q=${encodeURIComponent(titulo)}`;

    if (autor) {
        queryParams += `+inauthor:${encodeURIComponent(autor)}`;
    }


    const apiUrl = `https://www.googleapis.com/books/v1/volumes?${queryParams}`;

    const response = await fetch(apiUrl);
    const data = await response.json();

    if (data.items && data.items.length > 0) {
        const firstBook = data.items[0];
        const sampleLink = firstBook.accessInfo.webReaderLink;
        document.getElementById('amostra').setAttribute('onclick', `location.href='${sampleLink}'`);
        document.getElementById('amostra').style.textDecoration = "underline";
        document.getElementById('amostra').style.cursor = "pointer";
    } else {
        document.getElementById('amostra').innerHTML = "Sem amostra disponível";
    }
}

const titulo = document.getElementById('livro_titulo').textContent;
const autor = document.getElementById('autor-livro').textContent;

amostra(titulo, autor);