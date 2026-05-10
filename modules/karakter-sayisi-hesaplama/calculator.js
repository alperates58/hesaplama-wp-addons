function hcKarakterSayısıHesapla() {
    const text = document.getElementById('hc-cc-text').value;

    const withSpaces = text.length;
    const withoutSpaces = text.replace(/\s/g, '').length;
    const lines = text ? text.split(/\r\n|\r|\n/).length : 0;

    document.getElementById('hc-cc-with').innerText = withSpaces;
    document.getElementById('hc-cc-without').innerText = withoutSpaces;
    document.getElementById('hc-cc-lines').innerText = lines;
}
