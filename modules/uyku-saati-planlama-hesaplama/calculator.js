function hcSleepPlanHesapla() {
    const wakeStr = document.getElementById('hc-sp-wake').value;
    const age = document.getElementById('hc-sp-age').value;
    if (!wakeStr) return;

    const needs = {
        'adult': 8,
        'teen': 9,
        'child': 10,
        'senior': 7
    };

    const targetHrs = needs[age];
    const resList = document.getElementById('hc-sp-res-list');
    resList.innerHTML = '';

    const wakeTime = new Date('2026-01-02T' + wakeStr);
    
    // 15 min buffer for falling asleep
    const sleepTime = new Date(wakeTime.getTime() - (targetHrs * 60 * 60000) - (15 * 60000));
    const sleepStr = sleepTime.getHours().toString().padStart(2, '0') + ':' + sleepTime.getMinutes().toString().padStart(2, '0');

    resList.innerHTML = `
        <div class="hc-sp-card">
            <strong>İdeal Yatış Saati: ${sleepStr}</strong>
            <p>Seçtiğiniz yaş grubu için önerilen ${targetHrs} saatlik uykuya göre planlanmıştır.</p>
        </div>
    `;

    document.getElementById('hc-sleep-plan-result').classList.add('visible');
}
