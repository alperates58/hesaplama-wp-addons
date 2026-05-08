function hc3HaftaAnaliz() {
    const lmpVal = document.getElementById('hc-3w-lmp').value;

    if (!lmpVal) {
        alert('Lütfen SAT seçin.');
        return;
    }

    const lmp = new Date(lmpVal);
    const today = new Date();
    const diffDays = Math.floor((today - lmp) / (24 * 60 * 60 * 1000));
    const weeks = diffDays / 7;

    const status = document.getElementById('hc-3w-status');
    const desc = document.getElementById('hc-3w-desc');

    if (weeks < 3) {
        status.innerText = "HAYALİ POZİTİF / ÇOK ERKEN";
        status.style.backgroundColor = "#ffebee"; status.style.color = "#c62828";
        desc.innerText = "Henüz 3 haftalık bile değilsiniz. Bu aşamada test yapmak tamamen yanıltıcı olacaktır.";
    } else if (weeks < 4) {
        status.innerText = "ERKEN DÖNEM (3-4 HAFTA)";
        status.style.backgroundColor = "#fffde7"; status.style.color = "#fbc02d";
        desc.innerHTML = `
            <p>Şu an yaklaşık <b>3 haftalık</b> hamilelik dönemindesiniz (eğer döllenme olduysa).</p>
            <ul>
                <li><b>İdrar Testi:</b> %90 ihtimalle negatif çıkar (hCG henüz idrara geçmemiştir).</li>
                <li><b>Kan Testi (Beta hCG):</b> 5-50 mIU/mL arasında çok düşük bir değer görülebilir.</li>
                <li><b>Belirtiler:</b> Hafif yerleşme lekelenmesi veya göğüs hassasiyeti başlayabilir.</li>
            </ul>
            <p>En sağlıklı sonuç için adet gecikmesini beklemeniz önerilir.</p>
        `;
    } else {
        status.innerText = "3 HAFTAYI GEÇMİŞSİNİZ";
        status.style.backgroundColor = "#e8f5e9"; status.style.color = "#2e7d32";
        desc.innerText = "Hamilelik haftanız 3 haftayı geçmiş. Standart gebelik testleri artık daha güvenilir sonuç verecektir.";
    }

    document.getElementById('hc-3w-result').classList.add('visible');
}
