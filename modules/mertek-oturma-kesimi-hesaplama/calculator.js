function hcBirdsmouthHesapla() {
    const D = parseFloat(document.getElementById('hc-bm-depth').value);
    const pitch = parseFloat(document.getElementById('hc-bm-pitch').value);

    if (!D || !pitch) {
        alert('Lütfen ölçüleri giriniz.');
        return;
    }

    const rad = (pitch * Math.PI) / 180;
    
    // Seat cut usually 1/3 of depth or based on plate width. 
    // Standard approach for calculation:
    const seat = (D / 3);
    const heel = seat * Math.tan(rad);

    document.getElementById('hc-bm-seat').innerText = Math.round(seat);
    document.getElementById('hc-bm-heel').innerText = Math.round(heel);

    document.getElementById('hc-birdsmouth-result').classList.add('visible');
}
