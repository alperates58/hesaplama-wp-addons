function hcTrHesapla() {
    const cap = parseFloat(document.getElementById('hc-tr-cap').value);
    const cons = parseFloat(document.getElementById('hc-tr-cons').value);

    if (isNaN(cap) || isNaN(cons) || cons === 0) {
        alert('Lütfen geçerli değerler girin.');
        return;
    }

    const range = (cap / cons) * 100;

    document.getElementById('hc-tr-val').innerText = Math.round(range) + " km";
    document.getElementById('hc-tr-result').classList.add('visible');
}
