function hcProteinÇözünürlüğüHesapla() {
    const total = parseFloat(document.getElementById('hc-pc-total').value);
    const soluble = parseFloat(document.getElementById('hc-pc-soluble').value);

    if (!total || isNaN(soluble)) return;

    const percent = (soluble / total) * 100;

    document.getElementById('hc-pc-val').innerText = '% ' + percent.toFixed(2);
    document.getElementById('hc-pc-result').classList.add('visible');
}
