function hcHamPuanHesapla() {
    const correct = parseFloat(document.getElementById('hc-hp-correct').value) || 0;
    const wrong = parseFloat(document.getElementById('hc-hp-wrong').value) || 0;
    const factor = parseFloat(document.getElementById('hc-hp-factor').value);

    if (correct < 0 || wrong < 0) {
        alert('Lütfen pozitif değerler girin.');
        return;
    }

    let net = correct;
    if (factor > 0) {
        net = correct - (wrong / factor);
    }

    if (net < 0) net = 0;

    document.getElementById('hc-res-hp-net').innerText = net.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
    document.getElementById('hc-hp-desc').innerText = factor > 0 
        ? `${wrong} yanlış, ${ (wrong / factor).toLocaleString('tr-TR', {maximumFractionDigits: 2}) } doğruyu götürdü.`
        : "Yanlışlar hesaplamaya dahil edilmedi.";

    document.getElementById('hc-ham-puan-result').classList.add('visible');
}
