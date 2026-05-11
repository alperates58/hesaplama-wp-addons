function hcDiskSpaceHesapla() {
    const total = parseFloat(document.getElementById('hc-ds-total').value);
    const used = parseFloat(document.getElementById('hc-ds-used').value);

    if (isNaN(total) || isNaN(used) || total <= 0) {
        alert('Lütfen geçerli değerler girin.');
        return;
    }

    const free = total - used;
    const percent = (used / total) * 100;

    document.getElementById('hc-ds-res-percent').innerText = '%' + percent.toLocaleString('tr-TR', { maximumFractionDigits: 1 });
    document.getElementById('hc-ds-res-free').innerText = free.toLocaleString('tr-TR', { maximumFractionDigits: 1 }) + ' GB';

    // Estimations (Approximate)
    // 1080p Video: ~3 GB/hour
    // High Res Photo: ~5 MB each (200 photos per GB)
    // MP3: ~5 MB each (200 songs per GB)
    const videoHrs = free / 3;
    const photoCount = free * 200;
    const musicCount = free * 200;

    document.getElementById('hc-ds-est-video').innerText = '1080p Video: ' + Math.floor(videoHrs) + ' saat ' + Math.round((videoHrs % 1) * 60) + ' dk';
    document.getElementById('hc-ds-est-photo').innerText = 'Yüksek Çöz. Fotoğraf: ' + Math.floor(photoCount).toLocaleString('tr-TR') + ' adet';
    document.getElementById('hc-ds-est-music').innerText = 'MP3 Müzik: ' + Math.floor(musicCount).toLocaleString('tr-TR') + ' adet';
    
    document.getElementById('hc-ds-result').classList.add('visible');
}
