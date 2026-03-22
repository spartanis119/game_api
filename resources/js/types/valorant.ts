interface AbilitiesDetail {
    name: string;
    description: string;
}
interface AgentAbilities {
    c: AbilitiesDetail;
    q: AbilitiesDetail;
    e: AbilitiesDetail;
    x: AbilitiesDetail;
    passive?: AbilitiesDetail;
}

interface Agents {
    name: string;
    description: string;
    image: string;
    role: string;
    abilities: AgentAbilities;
}

interface Weapons {
    name: string;
    image: string;
}

interface Maps {
    name: string;
    image: string;
}

export interface ValorantPageProps {
    easyAgents: Agents[];
    myFavoriteAgents: Agents[];
    myFavoriteWeapons: Weapons[];
    myFavoriteMaps: Maps[];
}
