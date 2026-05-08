function hcVitaminDDeğerlendir() {
    let val = parseFloat(document.getElementById('hc-vde-value').value);
    const unit = document.getElementById('hc-vde-unit').value;

    if (isNaN(val)) {
        alert('Lütfen tahlil sonucunuzu girin.');
        return;
    }

    // Normalize to ng/mL
    if (unit === 'nmol/l') {
        val = val / 2.5;
    }

    const label = document.getElementById('hc-vde-label');
    const statusBox = document.getElementById('hc-vde-status');
    const desc = document.getElementById('hc-vde-desc');

    if (val < 12) {
        label.innerText = 'CİDDİ EKSİKLİK';
        statusBox.style.backgroundColor = '#ffebee';
        statusBox.style.color = '#c62828';
        desc.innerText = 'D vitamini seviyeniz kritik düzeyde düşük. Kemik sağlığı risk altındadır, doktorunuza başvurunuz.';
    } else if (val < 20) {
        label.innerText = 'EKSİKLİK / YETERSİZLİK';
        statusBox.style.backgroundColor = '#fff3e0';
        statusBox.style.color = '#ef6c00';
        desc.innerText = 'D vitamini seviyeniz önerilen sınırın altında. Takviye ihtiyacı olabilir.';
    } else if (val <= 50) {
        label.innerText = 'YETERLİ';
        statusBox.style.backgroundColor = '#e8f5e9';
        statusBox.style.color = '#2e7d32';
        desc.innerText = 'D vitamini seviyeniz normal ve sağlıklı aralıktadır.';
    } else if (val <= 100) {
        label.innerText = 'YÜKSEK';
        statusBox.style.backgroundColor = '#fffde7';
        statusBox.style.color = '#fbc02d';
        desc.innerText = 'Seviyeniz normalden yüksek ancak genellikle güvenli aralıktadır.';
    } else {
        label.innerText = 'AŞIRI YÜKSEK / TOKSİK';
        statusBox.style.backgroundColor = '#fce4ec';
        statusBox.style.color = '#880e4f';
        desc.innerText = 'Bu seviye toksik etki riski taşır. Takviye alıyorsanız durdurunuz ve doktorunuza danışınız.';
    }

    document.getElementById('hc-vit-d-eval-result').classList.add('visible');
}
