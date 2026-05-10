function hcKoltukÖlçüsüHesapla() {
    const persons = parseInt(document.getElementById('hc-sofa-persons').value);
    const typeWidth = parseInt(document.getElementById('hc-sofa-type').value === 'standard' ? 60 : (document.getElementById('hc-sofa-type').value === 'comfort' ? 80 : 100));

    if (!persons) return;

    // Genişlik = (Kişi Sayısı * Oturma Genişliği) + Kolçak Payı (yaklaşık 40cm)
    const width = (persons * typeWidth) + 40;

    document.getElementById('hc-sofa-val').innerText = width + ' cm';
    document.getElementById('hc-sofa-info').innerText = `Sadece oturma alanı: ${persons * typeWidth} cm. Derinlik genellikle 90-110 cm arasıdır.`;
    document.getElementById('hc-sofa-result').classList.add('visible');
}
