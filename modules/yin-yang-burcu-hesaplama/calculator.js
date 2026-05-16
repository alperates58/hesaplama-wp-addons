function hcYinYangHesapla() {
    const year = parseInt(document.getElementById('hc-yy-year').value);
    if (!year) {
        alert('Lütfen doğum yılınızı girin.');
        return;
    }

    const animals = ["Fare", "Öküz", "Kaplan", "Tavşan", "Ejderha", "Yılan", "At", "Keçi", "Maymun", "Horoz", "Köpek", "Domuz"];
    let idx = (year - 1900) % 12;
    if (idx < 0) idx += 12;

    const myAnimal = animals[idx];
    const isYang = idx % 2 === 0;

    const resultValue = isYang ? "Yang" : "Yin";
    let desc = `<p>Sizin Çin burcunuz: <strong>${myAnimal}</strong>.</p>`;

    if (isYang) {
        desc += `<p><strong>Yang Enerjisi:</strong> Aktif, dışa dönük ve eril enerjiyi temsil eder. Yang burçları genellikle daha girişken, doğrudan ve hareketli bir yapıya sahiptirler. Güneş, sıcaklık ve eylem ile ilişkilendirilirler.</p>`;
    } else {
        desc += `<p><strong>Yin Enerjisi:</strong> Pasif, içe dönük ve dişil enerjiyi temsil eder. Yin burçları genellikle daha sezgisel, düşünceli ve sakin bir yapıya sahiptirler. Ay, serinlik ve dinginlik ile ilişkilendirilirler.</p>`;
    }

    document.getElementById('hc-yy-value').innerText = resultValue;
    document.getElementById('hc-yy-desc').innerHTML = desc;
    document.getElementById('hc-yin-yang-burcu-result').classList.add('visible');
}
