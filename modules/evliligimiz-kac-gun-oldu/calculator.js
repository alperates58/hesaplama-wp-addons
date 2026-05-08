function hcEvlilikHesapla() {
    const dateStr = document.getElementById('hc-ev-date').value;
    if (!dateStr) { alert('Lütfen evlilik tarihinizi seçin.'); return; }

    const evDate = new Date(dateStr);
    const now = new Date();
    
    if (evDate > now) { alert('Evlilik tarihi gelecek bir tarih olamaz.'); return; }

    const diffMs = now - evDate;
    const diffDays = Math.floor(diffMs / (1000 * 60 * 60 * 24));
    
    const years = Math.floor(diffDays / 365);
    const months = Math.floor((diffDays % 365) / 30);
    const days = (diffDays % 365) % 30;

    document.getElementById('hc-ev-val').innerText = `${diffDays.toLocaleString('tr-TR')} Gün`;
    document.getElementById('hc-ev-details').innerHTML = `
        <p><strong>Detaylı Süre:</strong> ${years} yıl, ${months} ay, ${days} gün</p>
        <p>Siz birbiriniz için yaratılmışsınız! ✨</p>
    `;
    document.getElementById('hc-ev-result').classList.add('visible');
}
