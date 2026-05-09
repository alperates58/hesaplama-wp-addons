function hcBakteriBuyumesiHesapla() {
    const n0 = parseFloat(document.getElementById('hc-bac-n0').value);
    const time = parseFloat(document.getElementById('hc-bac-time').value);
    const genTime = parseFloat(document.getElementById('hc-bac-gen').value);

    if (isNaN(n0) || isNaN(time) || isNaN(genTime) || n0 < 0 || time < 0 || genTime <= 0) {
        alert('Lütfen geçerli değerler giriniz.');
        return;
    }

    const n = time / genTime;
    const finalN = n0 * Math.pow(2, n);

    document.getElementById('hc-bac-val').innerText = finalN.toLocaleString('tr-TR', { maximumFractionDigits: 0 });
    document.getElementById('hc-bac-note').innerText = `${time} dakika sonunda ${n.toLocaleString('tr-TR', { maximumFractionDigits: 2 })} nesil oluşmuştur.`;
    document.getElementById('hc-bac-result').classList.add('visible');
}
