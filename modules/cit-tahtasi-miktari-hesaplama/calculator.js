function hcCTAHesapla() {
    const len = parseFloat(document.getElementById('hc-cta-len').value) * 100; // to cm
    const boardW = parseFloat(document.getElementById('hc-cta-board-w').value);
    const gap = parseFloat(document.getElementById('hc-cta-gap').value) || 0;

    if (isNaN(len) || len <= 0 || isNaN(boardW) || boardW <= 0) {
        alert('Lütfen geçerli değerler giriniz.');
        return;
    }

    // Number of boards = total length / (board width + gap)
    const count = Math.ceil(len / (boardW + gap));

    document.getElementById('hc-cta-val').innerText = count.toLocaleString('tr-TR') + ' Adet';
    document.getElementById('hc-cta-result').classList.add('visible');
}
