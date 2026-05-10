function hcCircadianHesapla() {
    const wakeStr = document.getElementById('hc-cr-wake').value;
    if (!wakeStr) return;

    const timeline = document.getElementById('hc-cr-timeline');
    timeline.innerHTML = '';

    const wakeTime = new Date('2026-01-01T' + wakeStr);
    
    const activities = [
        { label: 'Güneş Işığı / Uyanış', offset: 0, desc: 'Kortizol salınımı için gün ışığı alın.' },
        { label: 'Kahvaltı', offset: 60, desc: 'Enerji metabolizması başlar.' },
        { label: 'En Yüksek Dikkat', offset: 180, desc: 'Zihinsel odaklanma gerektiren işler için ideal.' },
        { label: 'Öğle Yemeği', offset: 300, desc: 'Hafif bir öğün tercih edin.' },
        { label: 'En İyi Koordinasyon', offset: 540, desc: 'Fiziksel aktivite ve spor için en verimli zaman.' },
        { label: 'Melatonin Başlangıcı', offset: 780, desc: 'Parlak ışıklardan kaçının.' },
        { label: 'İdeal Uyku', offset: 900, desc: 'Deri uyku ve vücut onarımı.' }
    ];

    activities.forEach(act => {
        const time = new Date(wakeTime.getTime() + (act.offset * 60000));
        const timeStr = time.getHours().toString().padStart(2, '0') + ':' + time.getMinutes().toString().padStart(2, '0');
        
        const div = document.createElement('div');
        div.className = 'hc-cr-item';
        div.innerHTML = `
            <div class="hc-cr-time">${timeStr}</div>
            <div class="hc-cr-content">
                <strong>${act.label}</strong>
                <p>${act.desc}</p>
            </div>
        `;
        timeline.appendChild(div);
    });

    document.getElementById('hc-circadian-result').classList.add('visible');
}
