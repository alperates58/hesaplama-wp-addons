function hcİnternetVeriKullanımıHesapla() {
    const vidSD = parseFloat(document.getElementById('hc-data-vid-sd').value) || 0;
    const vidHD = parseFloat(document.getElementById('hc-data-vid-hd').value) || 0;
    const vid4K = parseFloat(document.getElementById('hc-data-vid-4k').value) || 0;
    const music = parseFloat(document.getElementById('hc-data-music').value) || 0;
    const browse = parseFloat(document.getElementById('hc-data-browse').value) || 0;

    // Saatlik tüketimler (GB)
    // SD: 0.7, HD: 3, 4K: 7, Music: 0.15, Browse: 0.2
    const dailyTotal = (vidSD * 0.7) + (vidHD * 3) + (vid4K * 7) + (music * 0.15) + (browse * 0.2);
    const monthlyTotal = dailyTotal * 30;

    document.getElementById('hc-data-val').innerText = monthlyTotal.toFixed(1) + ' GB';
    document.getElementById('hc-data-result').classList.add('visible');
}
