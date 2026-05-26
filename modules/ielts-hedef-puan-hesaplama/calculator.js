function hcIeltsHesapla() {
    var l = parseFloat(document.getElementById('hc-ielts-listening').value) || 0;
    var r = parseFloat(document.getElementById('hc-ielts-reading').value) || 0;
    var w = parseFloat(document.getElementById('hc-ielts-writing').value) || 0;
    var s = parseFloat(document.getElementById('hc-ielts-speaking').value) || 0;

    var avg = (l + r + w + s) / 4;
    var decimal = avg - Math.floor(avg);

    // IELTS Yuvarlama kuralları:
    // .0 - .24 arası -> .0'a yuvarlanır
    // .25 - .74 arası -> .5'e yuvarlanır
    // .75 ve üzeri -> üst tam sayıya yuvarlanır
    var overall = Math.floor(avg);
    if (decimal >= 0.75) {
        overall += 1.0;
    } else if (decimal >= 0.25) {
        overall += 0.5;
    }

    var seviye = 'Competent User (B2)';
    if (overall >= 8.0) seviye = 'Expert User (C2)';
    else if (overall >= 7.0) seviye = 'Good/Very Good User (C1)';
    else if (overall >= 6.0) seviye = 'Competent User (B2)';
    else if (overall >= 5.0) seviye = 'Modest User (B1)';
    else seviye = 'Limited/Extremely Limited User (A2/A1)';

    document.getElementById('hc-ielts-res-ort').innerText = avg.toFixed(2);
    document.getElementById('hc-ielts-res-overall').innerText = overall.toFixed(1);
    document.getElementById('hc-ielts-res-level').innerText = seviye;

    document.getElementById('hc-ielts-result').classList.add('visible');
}