function hcSansliGunTarihHesapla() {
    const dStr = document.getElementById('hc-ldd-date').value;
    if (!dStr) {
        alert('Lütfen doğum tarihinizi seçin.');
        return;
    }

    const d = new Date(dStr);
    const dayIdx = d.getDay(); // 0 (Pazar) - 6 (Cumartesi)

    const days = [
        { name: "Pazar", planet: "Güneş", desc: "Siz bir Güneş çocuğusunuz. Pazar günleri yaşama sevinciniz artar, kendinizi en parlak ve enerjik hissettiğiniz gündür. Liderlik ve yaratıcılık için en iyi gündür." },
        { name: "Pazartesi", planet: "Ay", desc: "Duygusal derinliğiniz Ay tarafından yönetilir. Pazartesi günleri sezgileriniz güçlenir. Ev, aile ve içsel huzur çalışmaları için şanslı gününüzdür." },
        { name: "Salı", planet: "Mars", desc: "Mars'ın enerjisiyle Salı günleri daha cesur ve girişimci olursunuz. Rekabet gerektiren işler ve fiziksel aktiviteler için en uğurlu gününüzdür." },
        { name: "Çarşamba", planet: "Merkür", desc: "Merkür'ün etkisiyle Çarşamba günleri iletişim ve zekanız zirvededir. Yazışmalar, toplantılar ve öğrenme süreçleri için şanslı gününüzdür." },
        { name: "Perşembe", planet: "Jüpiter", desc: "Jüpiter'in bolluk ve bereket enerjisi Perşembe günü sizinledir. Genişleme, şans ve finansal konularda en uğurlu zamanınızdır." },
        { name: "Cuma", planet: "Venüs", desc: "Venüs'ün aşk ve estetik enerjisi Cuma günleri sizi sarar. Sosyalleşmek, ikili ilişkiler ve güzellik çalışmaları için şanslı gününüzdür." },
        { name: "Cumartesi", planet: "Satürn", desc: "Satürn'ün disiplinli yapısı Cumartesi günü size dayanıklılık verir. Uzun vadeli planlar ve sorumluluklar için en verimli gününüzdür." }
    ];

    const myDay = days[dayIdx];

    document.getElementById('hc-ldd-value').innerText = `${myDay.name} (Gezegeni: ${myDay.planet})`;
    document.getElementById('hc-ldd-desc').innerHTML = `<p>${myDay.desc}</p>`;
    document.getElementById('hc-dogum-tarihine-gore-sansli-gun-result').classList.add('visible');
}
