function hcHedefHesapla() {
    const target = parseFloat(document.getElementById('hc-target-val').value);
    const actual = parseFloat(document.getElementById('hc-actual-val').value);

    if (isNaN(target) || isNaN(actual) || target === 0) {
        alert('Lütfen geçerli bir hedef ve gerçekleşen değer giriniz.');
        return;
    }

    const percentage = (actual / target) * 100;
    const progress = Math.min(100, Math.max(0, percentage));

    document.getElementById('hc-res-target-perc').innerText = percentage.toLocaleString('tr-TR', { 
        maximumFractionDigits: 2 
    });

    const bar = document.getElementById('hc-target-progress');
    bar.style.width = progress + '%';
    
    // Durum mesajı
    let status = '';
    if (percentage >= 100) status = 'Hedef tamalandı! 🎉';
    else if (percentage >= 75) status = 'Hedeve çok yakınsınız! 🚀';
    else if (percentage >= 50) status = 'Yarı yol geçildi! 👍';
    else status = 'Hedef için daha çok yol var. 💪';

    document.getElementById('hc-target-status').innerText = status;

    document.getElementById('hc-target-result').classList.add('visible');
}
