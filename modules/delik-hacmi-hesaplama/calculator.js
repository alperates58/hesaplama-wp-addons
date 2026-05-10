function hcHoleVolHesapla() {
    const D = parseFloat(document.getElementById('hc-hv-diam').value);
    const H = parseFloat(document.getElementById('hc-hv-depth').value);

    if (!D || !H) {
        alert('Lütfen çap ve derinlik bilgilerini giriniz.');
        return;
    }

    const r = (D / 100) / 2;
    const h = H / 100;
    const volM3 = Math.PI * Math.pow(r, 2) * h;
    const volL = volM3 * 1000;

    const resVal = document.getElementById('hc-hv-res-val');
    resVal.innerText = volL.toLocaleString('tr-TR', { minimumFractionDigits: 1, maximumFractionDigits: 1 });

    const resCum = document.getElementById('hc-hv-res-cum');
    resCum.innerText = `Eşdeğer Hacim: ${volM3.toFixed(3)} m³`;

    document.getElementById('hc-hole-vol-result').classList.add('visible');
}
