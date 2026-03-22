// Getting data from backend

// * Generate interfaces to type the way data will come
// ? Something to note is that an interface must be created for each parameter passed in the backend

interface Profile {
    name: string;
    code: string;
    level: number;
    profileIconId: number;
}

interface HabilityDetail {
    name: string;
    description: string;
}

interface ChampionHabilities {
    passive: HabilityDetail;
    q: HabilityDetail;
    w: HabilityDetail;
    e: HabilityDetail;
    r: HabilityDetail;
}

interface ChampionInfo {
    name: string;
    title: string;
    lore: string;
    habilities: ChampionHabilities;
}

interface ChampionsMastery {
    championInfo: ChampionInfo;
    championLevel: number;
    championPoints: number;
    requireGradeCounts: string;
}

export interface LolPageProps {
    profile: Profile;
    myChampionsData: ChampionsMastery[];
}
