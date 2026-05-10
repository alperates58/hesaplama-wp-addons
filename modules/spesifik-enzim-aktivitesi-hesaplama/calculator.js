function hcEnzimActHesapla() {
    const totalActivity = parseFloat(document.getElementById('hc-ea-total').value);
    const proteinAmount = parseFloat(document.getElementById('hc-ea-protein').value);

    if (!totalActivity || !proteinAmount) {
        alert('Lütfen tüm alanları doldurunuz.');
        return;
    }

    const specificActivity = totalActivity / proteinAmount;

    const resVal = document.getElementById('hc-ea-res-val');
    resVal.innerText = specificActivity.toFixed(2).toLocaleString('tr-TR');

    document.getElementById('hc-enz-act-result').classList.add('visible');
}
