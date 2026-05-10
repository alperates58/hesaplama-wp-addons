function hcMlvssHesapla() {
    const dry = parseFloat(document.getElementById('hc-mv-dry').value);
    const ash = parseFloat(document.getElementById('hc-mv-ash').value);
    const sample = parseFloat(document.getElementById('hc-mv-sample').value);

    if (isNaN(dry) || isNaN(ash) || !sample) {
        alert('Lütfen tüm değerleri giriniz.');
        return;
    }

    // MLVSS = (Kurutulmuş - Yakılmış) * 1000 / Örnek Hacmi (L)
    const mlvss = (dry - ash) * 1000000 / sample;

    const resVal = document.getElementById('hc-mv-res-val');
    resVal.innerText = Math.round(mlvss).toLocaleString('tr-TR');

    document.getElementById('hc-mlvss-calc-result').classList.add('visible');
}
