function hcVideoBitrateHesapla() {
    const pixels = parseInt(document.getElementById('hc-vb-res').value);
    const fps = parseInt(document.getElementById('hc-vb-fps').value) || 30;
    const bpp = parseFloat(document.getElementById('hc-vb-quality').value) || 0.1;

    const bitrateBps = pixels * fps * bpp;
    const bitrateMbps = bitrateBps / 1000000;
    
    const sizeGBPerHour = (bitrateBps * 3600) / (8 * 1024 * 1024 * 1024);

    document.getElementById('hc-res-vb-val').innerText = bitrateMbps.toLocaleString('tr-TR', { maximumFractionDigits: 1 }) + ' Mbps';
    document.getElementById('hc-res-vb-size').innerText = sizeGBPerHour.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' GB/saat';
    
    document.getElementById('hc-video-bitrate-result').classList.add('visible');
}
