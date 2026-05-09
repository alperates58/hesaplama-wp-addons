function hcDFHesapla() {
    const n1 = parseInt(document.getElementById('hc-df-n').value) || 0;
    const type = document.getElementById('hc-df-type').value;

    let df = 0;
    if (type === 'single') {
        df = n1 - 1;
    } else if (type === 'two') {
        const n2 = parseInt(document.getElementById('hc-df-n2').value) || 0;
        df = (n1 + n2) - 2;
    } else {
        df = "Tablo boyutuna bağlıdır.";
    }

    document.getElementById('hc-res-df-val').innerText = df;
    document.getElementById('hc-df-calc-result').classList.add('visible');
}
