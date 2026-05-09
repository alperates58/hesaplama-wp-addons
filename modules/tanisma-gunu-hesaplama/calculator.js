function hcTanismaHesapla() {
    const dateStr = document.getElementById('hc-tg-date').value;
    if (!dateStr) { alert('Lütfen tanışma tarihinizi seçin.'); return; }

    const tgDate = new Date(dateStr);
    const now = new Date();
    
    if (tgDate > now) { alert('Tanışma tarihi gelecek bir tarih olamaz.'); return; }

    const diffMs = now - tgDate;
    const diffDays = Math.floor(diffMs / (1000 * 60 * 60 * 24));
    
    const years = Math.floor(diffDays / 365);
    const months = Math.floor((diffDays % 365) / 30);
    const days = (diffDays % 365) % 30;

    document.getElementById('hc-tg-val').innerText = `${diffDays.toLocaleString('tr-TR')} Gün`;
    document.getElementById('hc-tg-details').innerHTML = `
        <p><strong>Detaylı Süre:</strong> ${years} yıl, ${months} ay, ${days} gün</p>
        <p>Her gününüz bir öncekinden daha güzel olsun! ❤️</p>
    `;
    document.getElementById('hc-tg-result').classList.add('visible');
}
