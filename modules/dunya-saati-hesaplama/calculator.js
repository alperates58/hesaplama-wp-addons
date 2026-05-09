function hcDunyaSaatiGuncelle() {
    const cities = [
        { name: "İstanbul", tz: "Europe/Istanbul" },
        { name: "Londra", tz: "Europe/London" },
        { name: "New York", tz: "America/New_York" },
        { name: "Tokyo", tz: "Asia/Tokyo" },
        { name: "Berlin", tz: "Europe/Berlin" },
        { name: "Dubai", tz: "Asia/Dubai" },
        { name: "Sidney", tz: "Australia/Sydney" },
        { name: "Moskova", tz: "Europe/Moscow" }
    ];

    let html = '';
    const now = new Date();

    cities.forEach(c => {
        const time = now.toLocaleTimeString('tr-TR', { timeZone: c.tz, hour: '2-digit', minute: '2-digit' });
        html += `<div class="hc-ds-card">
            <span class="hc-ds-city">${c.name}</span>
            <span class="hc-ds-time">${time}</span>
        </div>`;
    });

    document.getElementById('hc-ds-container').innerHTML = html;
}

// İlk yüklemede çalıştır
document.addEventListener('DOMContentLoaded', hcDunyaSaatiGuncelle);
// Veya WP loader ile tetiklendiği için direkt çağır
setTimeout(hcDunyaSaatiGuncelle, 100);
