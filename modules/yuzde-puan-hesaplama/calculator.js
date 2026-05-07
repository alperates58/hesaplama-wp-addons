function hcPuanHesapla() {
    const got = parseFloat(document.getElementById('hc-score-got').value);
    const total = parseFloat(document.getElementById('hc-score-total').value);

    if (isNaN(got) || isNaN(total) || total === 0) {
        alert('Lütfen geçerli değerler giriniz.');
        return;
    }

    const percentage = (got / total) * 100;
    const clampedPerc = Math.min(100, Math.max(0, percentage));

    document.getElementById('hc-res-puan-val').textContent = Math.round(percentage) + '%';
    document.getElementById('hc-res-circle-path').setAttribute('stroke-dasharray', `${clampedPerc}, 100`);

    let info = '';
    if (percentage >= 85) info = 'Mükemmel! 🌟';
    else if (percentage >= 70) info = 'Çok İyi! ✨';
    else if (percentage >= 50) info = 'Başarılı. 👍';
    else info = 'Daha çok çalışmalısın. 📚';

    document.getElementById('hc-puan-info').innerText = info;
    document.getElementById('hc-puan-result').classList.add('visible');
}
