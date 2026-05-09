function hcSRTHesapla() {
    const vol = parseFloat(document.getElementById('hc-srt-vol').value);
    const mlss = parseFloat(document.getElementById('hc-srt-mlss').value);
    const qw = parseFloat(document.getElementById('hc-srt-qw').value);
    const mlssw = parseFloat(document.getElementById('hc-srt-mlssw').value);

    if (isNaN(vol) || isNaN(mlss) || isNaN(qw) || isNaN(mlssw) || vol <= 0 || mlss <= 0 || qw <= 0 || mlssw <= 0) {
        alert('Lütfen geçerli pozitif değerler giriniz.');
        return;
    }

    // SRT = (V * MLSS) / (Qw * MLSSw)
    // Effluent SS ihmal edilmiştir (genelde çok küçüktür)
    const srt = (vol * mlss) / (qw * mlssw);

    document.getElementById('hc-srt-val').innerText = srt.toLocaleString('tr-TR', { maximumFractionDigits: 1 }) + ' gün';
    document.getElementById('hc-srt-note').innerText = `Sistemde toplam ${(vol * mlss / 1000).toLocaleString('tr-TR')} kg biyokütle bulunmaktadır.`;
    document.getElementById('hc-srt-result').classList.add('visible');
}
