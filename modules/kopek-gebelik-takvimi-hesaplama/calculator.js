function hcKopekTakvimHesapla() {
    const matingDateInput = document.getElementById('hc-kgt-date2').value;
    if (!matingDateInput) return;

    const matingDate = new Date(matingDateInput);
    const options = { day: 'numeric', month: 'long' };

    const addDays = (date, days) => {
        const result = new Date(date);
        result.setDate(result.getDate() + days);
        return result.toLocaleDateString('tr-TR', options);
    };

    document.getElementById('hc-kgt-res-date2').innerText = addDays(matingDate, 63);

    const milestones = [
        { day: 2, text: "Spermler yumurtalara ulaşır." },
        { day: 15, text: "Embriyolar rahim duvarına tutunmaya başlar." },
        { day: 25, text: "Veteriner hekiminiz kalp atışlarını duyabilir." },
        { day: 30, text: "Yavruların organları oluşmaya başlar." },
        { day: 45, text: "İskelet yapısı oluşur, röntgende görülebilir." },
        { day: 58, text: "Yavrular tamamen oluşmuştur, her an doğum başlayabilir." }
    ];

    let html = "";
    milestones.forEach(m => {
        html += `<li><strong>${addDays(matingDate, m.day)}:</strong> ${m.text}</li>`;
    });

    document.getElementById('hc-kgt-res-milestones').innerHTML = html;
    document.getElementById('hc-kopek-takvim-result').classList.add('visible');
}
