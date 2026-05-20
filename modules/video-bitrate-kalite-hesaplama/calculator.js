function hcVideoBitrateKaliteHesapla() {
    var resolution = parseFloat(document.getElementById('hc-bitrate-resolution').value);
    var fps = parseFloat(document.getElementById('hc-bitrate-fps').value);
    var quality = document.getElementById('hc-bitrate-quality').value;

    if (isNaN(resolution) || isNaN(fps) || resolution <= 0 || fps <= 0) {
        alert('Lütfen geçerli değerler giriniz.');
        return;
    }

    // Bitrate = resolution × fps × quality_factor
    var qualityFactors = { web: 0.02, streaming: 0.05, archive: 0.08, cinema: 0.12 };
    var qualityFactor = qualityFactors[quality] || 0.05;

    var basePixels = resolution * resolution;
    var recommendedBitrate = Math.round((basePixels * fps * qualityFactor) / 1000);

    var minBitrate = Math.round(recommendedBitrate * 0.7);
    var maxBitrate = Math.round(recommendedBitrate * 1.3);

    // 1 saat dosya boyutu
    var oneHourSize = (recommendedBitrate * 60 * 60) / 8 / 1024; // GB

    var qualityLabels = { web: 'Düşük', streaming: 'Orta', archive: 'Yüksek', cinema: 'Maksimum' };

    var recommendedStr = recommendedBitrate.toLocaleString('tr-TR') + ' Mbps';
    var rangeStr = minBitrate.toLocaleString('tr-TR') + ' - ' + maxBitrate.toLocaleString('tr-TR') + ' Mbps';
    var oneHourStr = oneHourSize.toLocaleString('tr-TR', { minimumFractionDigits: 1, maximumFractionDigits: 1 }) + ' GB';
    var gradeStr = qualityLabels[quality];

    document.getElementById('hc-bitrate-recommended-val').innerText = recommendedStr;
    document.getElementById('hc-bitrate-range-val').innerText = rangeStr;
    document.getElementById('hc-bitrate-1h-val').innerText = oneHourStr;
    document.getElementById('hc-bitrate-grade-val').innerText = gradeStr;

    document.getElementById('hc-video-bitrate-kalite-hesaplama-result').classList.add('visible');
}
