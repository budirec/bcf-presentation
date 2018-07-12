import { SectionPage } from './sectionPage.model';

export class SectionCheckpoint {
  public checkpointId: number | null = null;
  public sectionId: number | null = null;
  public name: string | null = null;
  public number: number | null = null;
  public createdAt: string | null = null;
  public modifiedAt: Date | null = null;
  public pages: SectionPage[] | null = null;
  [key: string]: string | null | number | Date | SectionPage[];

  constructor(obj: SectionCheckpointI) {
    Object.keys(obj).forEach((o) => {
      if (Array.isArray(o)) {
        this[o] = obj && obj[o].map((p: SectionPage) => new SectionPage(p))
      } else {
        this[o] = obj && obj[o];
      }
    })
  }
}

interface SectionCheckpointI {
  checkpointId: number | null;
  sectionId: number | null;
  name: string | null;
  number: number | null;
  createdAt: string | null;
  modifiedAt: Date | null;
  pages: SectionPage[] | null;
  [key: string]: string | null | number | Date | SectionPage[];
}
